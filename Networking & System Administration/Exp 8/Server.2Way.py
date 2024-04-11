import socket
import threading

SERVER_HOST = '127.0.0.1'
SERVER_PORT = 12345

server_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
server_socket.bind((SERVER_HOST, SERVER_PORT))
server_socket.listen(5)
print(f"Server is listening on {SERVER_HOST}:{SERVER_PORT}")

def handle_client(client_socket, client_address):
    print(f"Connected to client {client_address}")
    while True:
        data = client_socket.recv(1024).decode()
        if not data:
            break
        print(f"Received from client {client_address}: {data}")

        response = input("Enter response to client: ")
        client_socket.sendall(response.encode())

    client_socket.close()
    print(f"Connection with client at {client_address} closed")

while True:
    client_socket, client_address = server_socket.accept()
    client_thread = threading.Thread(target=handle_client, args=(client_socket, client_address))
    client_thread.start()
