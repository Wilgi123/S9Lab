import socket

# Create a UDP socket
client_socket = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)

# Server address and port
server_address = ('localhost', 12345)

while True:
    # Get user input
    message = input('Enter message: ')

    # Send data to the server
    client_socket.sendto(message.encode(), server_address)

    # Receive response from the server
    response, _ = client_socket.recvfrom(1024)
    print('Server response:', response.decode())
