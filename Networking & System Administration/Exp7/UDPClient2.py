import socket

client_socket = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)

client_socket.connect(('127.0.0.1', 12345))
sentence=input("enter sentence in lowercase:");
client_socket.sendto(sentence.encode(), ('127.0.0.1',12345));
data = client_socket.recv(1024)
print(f"Received from server: {data.decode()}")

client_socket.close()
