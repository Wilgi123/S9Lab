import copy

class Router:
    def __init__(self, name):
        self.name = name
        self.routing_table = {}

    def update_routing_table(self, destination, cost):
        self.routing_table[destination] = cost

    def get_routing_table(self):
        return copy.deepcopy(self.routing_table)


if __name__ == "__main__":
    router_a = Router('A')

    router_a.update_routing_table('B', 2)
    router_a.update_routing_table('C', 1)

    print(f"Original Routing Table for Router {router_a.name}:")
    print(router_a.get_routing_table())

    # Update the routing table
    router_a.update_routing_table('B', 5)
    router_a.update_routing_table('D', 3)

    print(f"Updated Routing Table for Router {router_a.name}:")
    print(router_a.get_routing_table())
