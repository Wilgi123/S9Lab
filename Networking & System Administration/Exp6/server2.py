import socket

server_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

server_socket.bind(('0.0.0.0', 12345))
server_socket.listen(5)

while True:
    client_socket, client_address = server_socket.accept()
    print(f"Connection from {client_address}")
    data = client_socket.recv(1024)
    if not data:
        break
    modifydata=data.upper()
    client_socket.sendall(modifydata)
    client_socket.close()  # Close the client socket after handling its request

server_socket.close()
