import copy

class Router:
    def __init__(self,name):
        self.name=name
        self.routing_table={}

    def update_routing_table(self,destination,cost):
        self.routing_table[destination]=cost

    def get_routing_table(self):
        return copy.deepcopy(self.routing_table)
   
    def distance_vector_algorithm(routers,max_iterations=10):
        for _ in range(max_iterations):
            for router in routers:
                for destination, cost in router.get_routing_table().items():
                    for neighbour in routers:
                        if neighbour != router:
                            if destination not in neighbour.routing_table or \
                                router.routing_table[destination]+ neighbour.routing_table[router.name]<neighbour.routing_table[destination]:
                                neighbour.update_routing_table(destination,router.routing_table[destination]+neighbour.routing_table[router.name])

def print_routing_tables(routers):
    for router in routers:
        print(f"Router{router.name} routing Tables:")
        for destination, cost in router.get_routing_table().items():
            print(f"Destination:{destination},cost: {cost}")
        print()
   
if __name__ == "__main__":
    # Create routers
    router_A = Router("A")
    router_B = Router("B")
    router_C = Router("C")

    # Initialize routing tables
router_A.update_routing_table("A", 0)
router_A.update_routing_table("B", 1)
router_A.update_routing_table("C", float('inf'))

router_B.update_routing_table("A", 1)
router_B.update_routing_table("B", 0)
router_B.update_routing_table("C", 1)

router_C.update_routing_table("A", float('inf'))
router_C.update_routing_table("B", 1)
router_C.update_routing_table("C", 0)


    # Run the distance vector algorithm
Router.distance_vector_algorithm([router_A, router_B, router_C])

    # Print the routing tables
print_routing_tables([router_A, router_B, router_C])