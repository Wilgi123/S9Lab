import os
import hashlib

def calculate_md5(file_path):
    """
    Calculate the MD5 checksum for a file.
    """
    md5_hash = hashlib.md5()
    with open(file_path, "rb") as f:
        for chunk in iter(lambda: f.read(4096), b""):
            md5_hash.update(chunk)
    return md5_hash.hexdigest()

def find_duplicate_files(root_dir):
    """
    Recursively find and print duplicate files in a directory tree.
    """
    checksums = {}

    for dirpath, _, filenames in os.walk(root_dir):
        for filename in filenames:
            filepath = os.path.join(dirpath, filename)
            checksum = calculate_md5(filepath)
            if checksum in checksums:
                print(f"Duplicate found: {filepath}")
                print(f" - Duplicate of: {checksums[checksum]}")
            else:
                checksums[checksum] = filepath

def main():
    root_dir = r"C:\Users\ajcemca\Downloads"
    print("Searching for duplicate files in:", root_dir)
    find_duplicate_files(root_dir)

if __name__ == "__main__":
    main()
