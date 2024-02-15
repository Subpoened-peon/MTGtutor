# Use a base image with Node.js installed
FROM node:latest

# Install any additional dependencies required for testing
RUN npm install -g eslint stylelint htmlhint jsonlint

# Install OpenSSL
RUN apt-get update && \
    apt-get install -y openssl zip

# Set the working directory in the container
WORKDIR /app

# Copy the application files into the container
COPY . .

RUN chmod +x build.sh

# Define the command to run when the container starts
CMD ["bash"]
