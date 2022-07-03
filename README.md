# box food

## Requirments
    - Install [Docker Desktop](https://www.docker.com/products/docker-desktop/)
    - Install and enable [WSL2](https://docs.microsoft.com/en-us/windows/wsl/install)
    - Launch [Windows Terminal](https://apps.microsoft.com/store/detail/windows-terminal/9N0DX20HK701?hl=en-us&gl=US)
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
    * Configure a Bash alias that allows you to execute Sail's commands
    ```
    alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
    ```
    * Run
    ```
    sail up
    sail artisan migrate --seed
    ```
