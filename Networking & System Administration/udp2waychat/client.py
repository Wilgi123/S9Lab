import socket

SERVER_HOST = '127.0.0.1'
SERVER_PORT = 12345

client_socket = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
client_socket.connect((SERVER_HOST, SERVER_PORT))

while True:
    message = input("Enter your message (type 'quit' to exit): ")
    client_socket.sendto(message.encode(), (SERVER_HOST, SERVER_PORT))

    if message.lower() == 'quit':
        break

    data, _ = client_socket.recvfrom(1024)
    print(f"Received from server: {data.decode()}")

client_socket.close()
