#!/bin/bash
# This script is experimental. It restores configuration, and content input files. Run it from this directory only.
set -euo pipefail

# Get the absolute directory where this script lives
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

# Go up two levels to reach the project root
PROJECT_ROOT="$(cd "$SCRIPT_DIR/../.." && pwd)"

# Define backup source and restore destinations
BACKUP_DIR="$PROJECT_ROOT/Temporary 2/f273cde7_backup"
RESTORE_DIR1="$PROJECT_ROOT/Source/Configuration Files"
RESTORE_DIR2="$PROJECT_ROOT/Source/Content Inputs"

echo "Backup source: $BACKUP_DIR"
echo "Restore 1:     $RESTORE_DIR1"
echo "Restore 2:     $RESTORE_DIR2"

# Define specific backup subdirectories
BACKUP_SOURCE1="$BACKUP_DIR/Configuration Files"
BACKUP_SOURCE2="$BACKUP_DIR/Content Inputs"

# Safety checks
if [ ! -d "$BACKUP_SOURCE1" ]; then
    echo "ERROR: Backup source directory 1 does not exist."
    exit 1
fi

if [ ! -d "$BACKUP_SOURCE2" ]; then
    echo "ERROR: Backup source directory 2 does not exist."
    exit 1
fi

if ! command -v rsync >/dev/null 2>&1; then
    echo "ERROR: rsync is not installed."
    exit 1
fi

# Create restore directories if they do not exist
mkdir -p "$RESTORE_DIR1"
mkdir -p "$RESTORE_DIR2"

# Restore backup directory 1
echo "Restoring: $BACKUP_SOURCE1"
rsync -av "$BACKUP_SOURCE1/" "$RESTORE_DIR1/"

# Restore backup directory 2
echo "Restoring: $BACKUP_SOURCE2"
rsync -av "$BACKUP_SOURCE2/" "$RESTORE_DIR2/"

echo "Restore completed successfully."