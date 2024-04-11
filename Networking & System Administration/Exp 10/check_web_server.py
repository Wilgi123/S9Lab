import socket

def check_web_server(host, port=80):
    client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    client_socket.settimeout(10)
    
    try:
        client_socket.connect((host, port))
        request = f"GET / HTTP/1.1\nHost: {host}\r\n\r\n"
        client_socket.send(request.encode())
        response = client_socket.recv(4096)
        status_code = response.decode().split('\r\n')[0].split(' ')[1]
        print(f"Response from {host}:{port} - Status code: {status_code}")
    except socket.error as e:
        print(f"Error: {e}")
    finally:
        client_socket.close()

if __name__ == "__main__":
    host = input("Enter the host or IP address: ")
    port = input("Enter the port number (default is 80): ")

    if port:
        port = int(port)
    else:
        port = 80

    check_web_server(host, port)
