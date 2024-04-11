import xmlrpc.client

server = xmlrpc.client.ServerProxy("http://localhost:8000")

# Addition
result_add = server.add(3, 5)
print("Result of addition:", result_add)

# Subtraction
result_subtract = server.subtract(8, 4)
print("Result of subtraction:", result_subtract)

# Multiplication
result_multiply = server.multiply(3, 5)
print("Result of multiplication:", result_multiply)

# Division
result_divide = server.divide(10, 2)
print("Result of division:", result_divide)
