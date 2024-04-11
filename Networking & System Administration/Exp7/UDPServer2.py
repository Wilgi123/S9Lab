import socket;

server_socket=socket.socket(socket.AF_INET,socket.SOCK_DGRAM);

server_socket.bind(('127.0.0.1',12345));
print("UDP server is listening on 127.0.0.1:12345")
while True:
    data,client_address=server_socket.recvfrom(1024);
    print(f"Connection from {client_address}");
    server_socket.sendto(data, client_address);


