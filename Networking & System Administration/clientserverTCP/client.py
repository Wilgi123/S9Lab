import socket

# Create a TCP socket
client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

# Connect to the server
client_socket.connect(('127.0.0.1', 12345))

# Get user input
sentence = input("Enter a sentence in lowercase: ")

# Send the sentence to the server
client_socket.sendall(sentence.encode())

# Receive response from the server
data = client_socket.recv(1024)
print(f"Received from server: {data.decode()}")

# Close the connection
client_socket.close()
