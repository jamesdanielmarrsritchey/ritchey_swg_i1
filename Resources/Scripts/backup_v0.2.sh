#!/bin/bash
# This script is experimental. It backs up configuration, content input files, and uploads. Run it from this directory only.
set -euo pipefail

# Get the absolute directory where this script lives
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

# Go up two levels to reach the project root
PROJECT_ROOT="$(cd "$SCRIPT_DIR/../.." && pwd)"

# Define source and destination
SOURCE_DIR1="$PROJECT_ROOT/Source/Configuration Files"
SOURCE_DIR2="$PROJECT_ROOT/Source/Content Inputs"
SOURCE_DIR3="$PROJECT_ROOT/Source/Uploads"
DEST_DIR="$PROJECT_ROOT/Temporary 2/f273cde7_backup"

echo "Source 1:    $SOURCE_DIR1"
echo "Source 2:    $SOURCE_DIR2"
echo "Source 3:    $SOURCE_DIR3"
echo "Destination: $DEST_DIR"

# Safety checks
if [ ! -d "$SOURCE_DIR1" ]; then
    echo "ERROR: Source directory 1 does not exist."
    exit 1
fi

if [ ! -d "$SOURCE_DIR2" ]; then
    echo "ERROR: Source directory 2 does not exist."
    exit 1
fi

if [ ! -d "$SOURCE_DIR3" ]; then
    echo "ERROR: Source directory 3 does not exist."
    exit 1
fi

if ! command -v rsync >/dev/null 2>&1; then
    echo "ERROR: rsync is not installed."
    exit 1
fi

# Create destination directory if it does not exist
mkdir -p "$DEST_DIR"

# Backup source directory 1
echo "Backing up: $SOURCE_DIR1"
rsync -av --delete "$SOURCE_DIR1/" "$DEST_DIR/Configuration Files/"

# Backup source directory 2
echo "Backing up: $SOURCE_DIR2"
rsync -av --delete "$SOURCE_DIR2/" "$DEST_DIR/Content Inputs/"

# Backup source directory 3
echo "Backing up: $SOURCE_DIR3"
rsync -av --delete "$SOURCE_DIR3/" "$DEST_DIR/Uploads/"

echo "Backup completed successfully."