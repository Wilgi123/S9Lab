import socket

# Create a TCP socket
server_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

# Bind the socket to the address and port
server_socket.bind(('127.0.0.1', 12345))

# Listen for incoming connections
server_socket.listen(1)
print("TCP server is listening on 127.0.0.1:12345")

# Accept a connection
connection, client_address = server_socket.accept()
print(f"Connection from {client_address}")

# Receive data from the client
data = connection.recv(1024).decode()
print(f"Received from client: {data}")

# Convert the received data to uppercase
data_upper = data.upper()

# Send the uppercase data back to the client
connection.sendall(data_upper.encode())

# Close the connection
connection.close()

# Close the server socket
server_socket.close()
