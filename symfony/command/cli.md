# CLI

Install CLI

[Install](https://symfony.com/download)

```bash
# bashInstall symfony CLI (run last step is shown to make global)
wget https://get.symfony.com/cli/installer -O - \

# Install ca (ubuntu)
symfony server:ca:install

# Create project [specific version] [web skeleton]
symfony new <project-name> [--version=X.X] [--full]

# Start Server
symfony serve

# With  php server
php -S 127.0.0.1:8000 -t public

# Show php version and which one is in use
symfony local:php:list
```

---
[<-- index-section](/symfony/command/index.md)

[<-- index/symfony](/symfony/index.md)

[<-- index](/README.md)
