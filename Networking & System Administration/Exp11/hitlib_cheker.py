import http.client


def check_web_server_httplib(host,port=80):

    try:
        conn=http.client.HTTPConnection(host,port,timeout=10)
        conn.request("GET", "/")
        response = conn.getresponse()
        print(f"Response from {host}:{port} - Status code :{response.status}")
    except ConnectionRefusedError:
        print(f"Connection to {host}:{port} is refused")
    except Exception as e:
        print(f"An error occured {str(e)}")


if __name__ == "__main__":
    host=input("Enter host name or ip address:")
    port=input("Enter port number(default is 80):")

    if port:
        port=int(port)
    else:
        port=80
    
    check_web_server_httplib(host,port)