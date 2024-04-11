import socket

SERVER_HOST = '127.0.0.1'
SERVER_PORT = 12345

client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
print(f"Connecting to server at {SERVER_HOST}:{SERVER_PORT}")

client_socket.connect((SERVER_HOST, SERVER_PORT))

while True:
    message = input("Enter the message (type 'quit' to exit): ")
    client_socket.sendall(message.encode())

    if message.lower() == 'quit':
        break

    response = client_socket.recv(1024).decode()
    print(f"Received from server: {response}")

client_socket.close()
