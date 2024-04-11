
import socket;

server_socket=socket.socket(socket.AF_INET,socket.SOCK_STREAM);

server_socket.bind(('127.0.0.1',12345));
server_socket.listen(5);
while True:
    client_socket,client_address=server_socket.accept();
    print(f"Conection from {client_address}");
    data=client_socket.recv(1024);
    if not data:
        break;
    client_socket.sendall(data);

client_socket.close();
server_socket.close();
