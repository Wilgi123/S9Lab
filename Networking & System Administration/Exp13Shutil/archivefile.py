import shutil

# Directory to be archived
directory_to_archive = r'C:\Users\ajcemca\Desktop\folder_to_archive'

# Path and name for the archive file
archive_file = r'C:\Users\ajcemca\Desktop\archive.zip'

# Create the archive (ZIP format)
shutil.make_archive(archive_file, 'zip', directory_to_archive)


