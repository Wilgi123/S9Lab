import socket

def check_tcp_port(host, port):
    try:
        # Create a TCP socket
        s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
        
        # Set a timeout for the connection attempt
        s.settimeout(5)
        
        # Attempt to connect to the host and port
        s.connect((host, port))
        
        # If connection succeeds, print a success message
        print(f"Port {port} is open on {host}")
    except socket.error as e:
        # If connection fails, print an error message
        print(f"Port {port} is closed or unreachable on {host}: {e}")
    finally:
        # Close the socket
        s.close()

if __name__ == "__main__":
    host = input("Enter the host or IP address: ")
    port = int(input("Enter the port number: "))

    check_tcp_port(host, port)
