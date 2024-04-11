from xmlrpc.server import SimpleXMLRPCServer

# Define the function that you want to expose via XML-RPC
def add(x, y):
    return x + y

# Create a SimpleXMLRPCServer
server = SimpleXMLRPCServer(("localhost", 8000))

# Register the function to be exposed
server.register_function(add, "add")

# Start the server
print("Server listening on port 8000...")
server.serve_forever()
