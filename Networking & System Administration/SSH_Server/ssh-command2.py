import paramiko 

def execute_ssh(hostname,port,username, password,command):
    ssh_client = paramiko.SSHClient()
    ssh_client.set_missing_host_key_policy(paramiko.AutoAddPolicy)
    try:
        ssh_client.connect(hostname,port, username, password)
        print ("SSH connection established")
        stdin,stdout,stderr= ssh_client.exec_command(command)
        output= stdout.read().decode('utf-8')
        error=stderr.read().decode('utf-8')
        if output:
            print(f"Output is ",output)
        if error:
            print(f"Error is ",error)
    except paramiko.AuthenticationException as e:
        print(f"Authentication failed: {e}")
    except paramiko.SSHException as e:
        print(f"SSH exception: {e}")

    finally:
        ssh_client.close()
        
if __name__ == '__main__':
    hostname=input("Enter hostname:")
    port=int(input("Enter port (default is 22):"))
    username=input("Enter username:")
    password=input("Enter password:")
    command=input("Enter command:")
    execute_ssh(hostname,port,username,password,command)
