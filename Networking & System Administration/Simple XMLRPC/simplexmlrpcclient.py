import xmlrpc.client

# Create an XML-RPC client proxy
proxy = xmlrpc.client.ServerProxy("http://localhost:8000/")

# Call the remote function
result = proxy.add(3, 5)
print("Result:", result)
