#!/bin/bash
SOURCE_DIR="${GITHUB_WORKSPACE}"
OUTPUT_DIR="${GITHUB_WORKSPACE}/build"
DOCKER_IMAGE_NAME="my-extension-test-image"

# Ensure the output directory exists
mkdir -p "${OUTPUT_DIR}"

# Change directory to the source directory
cd "${SOURCE_DIR}" || exit

# Build the Docker image
docker build -t "${DOCKER_IMAGE_NAME}" .

# Create a zip file for the extension (optional)
zip -r "${OUTPUT_DIR}/MTGtutor.zip" .

# Output success message
echo "Extension package created: ${OUTPUT_DIR}/MTGtutor.zip"

# testing .yml file
