import re
import fitz
import mysql.connector
from mysql.connector import Error
from datetime import datetime

pdf_path = 'C:/OSPanel/home/mestosporta.local/resources/scripts/gog.pdf'

with fitz.open(pdf_path) as pdf:
    text = ''
    for page_num in range(1, min(2495, pdf.page_count)):
        page = pdf[page_num]
        text += page.get_text()


lines = text.strip().split("\n")

events = []

i = 0
while i < len(lines):
    if re.match(r'^\d{16}$', lines[i]):
        event_data = {'id': lines[i]}
        i += 1
        event_data['name'] = lines[i].replace('\n', ' ').strip()
        i += 1

        description_lines = []
        description_started = False
        while i < len(lines):
            if re.match(r'^\d{2}\.\d{2}\.\d{4}$', lines[i]) or re.match(r'^\d{4}-\d{2}-\d{2}$', lines[i]):
                break

            if not description_started and lines[i][0].islower():
                description_started = True

            if description_started:
                description_lines.append(lines[i].strip())

            i += 1

        event_data['description'] = ' '.join(description_lines) if description_started else ''

        if i < len(lines):
            event_data['start_date'] = lines[i].strip()
            i += 1
        if i < len(lines):
            event_data['end_date'] = lines[i].strip()
            i += 1

        if 'start_date' in event_data:
            event_data['start_date'] = datetime.strptime(event_data['start_date'], '%d.%m.%Y').date() if re.match(
                r'^\d{2}\.\d{2}\.\d{4}$', event_data['start_date']) else datetime.strptime(event_data['start_date'],
                                                                                           '%Y-%m-%d').date()

        if 'end_date' in event_data:
            event_data['end_date'] = datetime.strptime(event_data['end_date'], '%d.%m.%Y').date() if re.match(
                r'^\d{2}\.\d{2}\.\d{4}$', event_data['end_date']) else datetime.strptime(event_data['end_date'],
                                                                                         '%Y-%m-%d').date()
        location_lines = []
        while i < len(lines) and not re.match(r'^\d+$', lines[i]):
            location_lines.append(lines[i].strip())
            i += 1
        event_data['location'] = ', '.join(location_lines)

        if i < len(lines) and re.match(r'^\d+$', lines[i]):
            event_data['participants'] = int(lines[i])
            i += 1

        events.append(event_data)
    else:
        i += 1

# for event in events:
#     print(f"ID: {event['id']}")
#     print(f"Name: {event['name']}")
#     print(f"Description: {event.get('description', 'N/A')}")
#     print(f"Start Date: {event.get('start_date', 'N/A')}")
#     print(f"End Date: {event.get('end_date', 'N/A')}")
#     print(f"Location: {event.get('location', 'N/A')}")
#     print(f"Participants: {event.get('participants', 'N/A')}")
#     print("-" * 40)

def create_connection(host_name, user_name, user_password, db_name):
    connection = None
    try:
        connection = mysql.connector.connect(
            host=host_name,
            user=user_name,
            password=user_password,
            database=db_name
        )
        print("Соединение с MySQL успешно установлено")
    except Error as e:
        print(f"Ошибка '{e}' при подключении к MySQL")
    return connection

def insert_event(cursor, event):
    insert_event_query = """
    INSERT INTO competitions (id, type, description, start_date, end_date, location, participants)
    VALUES (%s, %s, %s, %s, %s, %s, %s)
    ON DUPLICATE KEY UPDATE
        type = VALUES(type),
        description = VALUES(description),
        start_date = VALUES(start_date),
        end_date = VALUES(end_date),
        location = VALUES(location),
        participants = VALUES(participants)
    """
    cursor.execute(insert_event_query, (
        event['id'],
        event['name'],
        event['description'],
        event['start_date'],
        event['end_date'],
        event['location'],
        event.get('participants')
    ))

host_name = "MySql-8.0"
user_name = "root"
user_password = ""
db_name = "mestosporta.local"

connection = create_connection(host_name, user_name, user_password, db_name)

if connection:
    cursor = connection.cursor()

    for event in events:
        insert_event(cursor, event)

    connection.commit()

    cursor.close()
    connection.close()
