import heapq

class Network:
    def __init__(self):
        self.graph = {}

    def add_node(self, node):
        if node not in self.graph:
            self.graph[node] = {}

    def add_edge(self, node1, node2, cost):
        self.add_node(node1)
        self.add_node(node2)
        self.graph[node1][node2] = cost
        self.graph[node2][node1] = cost

    def dijkstra(self, start):
        distances = {node: float('infinity') for node in self.graph}
        distances[start] = 0

        priority_queue = [(0, start)]

        while priority_queue:
            current_distance, current_node = heapq.heappop(priority_queue)

            if current_distance > distances[current_node]:
                continue

            for neighbor, weight in self.graph[current_node].items():
                distance = current_distance + weight
                if distance < distances[neighbor]:
                    distances[neighbor] = distance
                    heapq.heappush(priority_queue, (distance, neighbor))

        return distances

# Example Usage
network = Network()

network.add_edge('A', 'B', 1)
network.add_edge('A', 'C', 3)
network.add_edge('B', 'C', 1)
network.add_edge('B', 'D', 4)
network.add_edge('C', 'D', 1)
network.add_edge('D', 'E', 2)

start_node = 'A'
shortest_distances = network.dijkstra(start_node)

print(f"Shortest distances from node {start_node}: {shortest_distances}")
