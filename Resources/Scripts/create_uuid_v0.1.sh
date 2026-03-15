#!/bin/bash
# This script is experimental. It creates a UUID. Run it from any directory.
# Usage: ./create_uuid_v0.1.sh #
# sudo apt-get install uuidgen
count_var="${1:-1}"

# Validate that the argument is a positive integer
if ! [[ "$count_var" =~ ^[0-9]+$ ]] || [ "$count_var" -lt 1 ]; then
    echo "Error: Parameter must be a positive integer."
    exit 1
fi

output_var=""

for ((i=1; i<=count_var; i++)); do
    uuid_var=$(uuidgen -r | tr -d '-')
    output_var="${output_var}${uuid_var}"
done

echo "$output_var"