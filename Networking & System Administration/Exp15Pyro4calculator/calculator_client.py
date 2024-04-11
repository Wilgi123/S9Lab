import Pyro4

# Connect to the Pyro server
ns = Pyro4.locateNS()
uri = ns.lookup("calculator")
calculator = Pyro4.Proxy(uri)

# Check if the connection to the server is successful
if calculator is not None:
    # Perform calculations
    x = float(input("Enter the first number: "))
    y = float(input("Enter the second number: "))
    operation = input("Enter the operation (+, -, *, /): ")

    if operation == '+':
        result = calculator.add(x, y)
    elif operation == '-':
        result = calculator.subtract(x, y)
    elif operation == '*':
        result = calculator.multiply(x, y)
    elif operation == '/':
        result = calculator.divide(x, y)
    else:
        print("Invalid operation")
        result = None

    if result is not None:
        print("Result:", result)
else:
    print("Error: Could not connect to the server.")
