import socket

# Create a UDP socket
server_socket = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)

# Bind the socket to the address and port
server_address = ('localhost', 12345)
server_socket.bind(server_address)

print('Server listening on', server_address)

while True:
    # Receive data from the client
    data, client_address = server_socket.recvfrom(1024)
    print('Received:', data.decode())

    # Send a response back to the client
    response = 'Message received successfully'
    server_socket.sendto(response.encode(), client_address)
