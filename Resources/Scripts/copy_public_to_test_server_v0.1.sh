#!/bin/bash
# This script is experimental. It is intended for my own internal use while developing this project. Locations, and permissions it uses are specific to my development setup, and MUST be modified if used elsewhere. This script is not for copying files to a public webserver. It is for copying files from my development folder to a locally hosted testing server. Run it from this directory only.
#!/bin/bash
set -euo pipefail

# Get the absolute directory where this script lives
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

# Go up two levels to reach the project root
PROJECT_ROOT="$(cd "$SCRIPT_DIR/../.." && pwd)"

# Define source and destination
SOURCE_DIR="$PROJECT_ROOT/www/public"
DEST_DIR="/var/www/html"

echo "Source:      $SOURCE_DIR"
echo "Destination: $DEST_DIR"

# Safety check
if [ ! -d "$SOURCE_DIR" ]; then
    echo "ERROR: Source directory does not exist."
    exit 1
fi

# Sync files safely
sudo rsync -a --delete "$SOURCE_DIR/" "$DEST_DIR/"

echo "Deployment complete."