# box food

## Requirments

* Install [Docker Desktop](https://www.docker.com/products/docker-desktop/)
* Install and enable [WSL2](https://docs.microsoft.com/en-us/windows/wsl/install)
    ```
    wsl --install
    wsl --list --online
    wsl --install -d Ubuntu
    wsl --set-version Ubuntu 2
    ```
* In Docker Desktop make sure Use the WSL 2 based engine (Windows Home can only run the WSL 2 backend) is checked:
> Open Docker Desktop and navigate to Settings->General
* In Docker Desktop make sure to Enable integration with additional distros and activate the Ubuntu distro we installed previously:
> Open Docker Desktop and navigate to Settings->Resources->WSL Integration
* Launch [Windows Terminal](https://apps.microsoft.com/store/detail/windows-terminal/9N0DX20HK701?hl=en-us&gl=US)
* Begin a new terminal session for your WSL2 Linux operating system.
* Run
    ```
    git clone https://github.com/ibrahim-aboukhalil/box-food.git
    ```
* Run
    ```
    cd box-food
    ```
* Run
    ```
    sudo chmod 755 start.sh
    ```
* Run
    ```
    ./start.sh
    ```