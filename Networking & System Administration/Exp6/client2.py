import socket

client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

client_socket.connect(('127.0.0.1', 12345))
variable=input("Enter sentence in lowercase")
client_socket.sendall(variable.encode())
data = client_socket.recv(1024)
print(f"Received from server: {data.decode()}")

client_socket.close()