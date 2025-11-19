Vagrant.configure("2") do |config|
  # Database VM
  config.vm.define "db" do |db|
    db.vm.box = "debian/bookworm64"
    db.vm.hostname = "db-server"
    db.vm.network "private_network", ip: "192.168.56.11"
    
    db.vm.provider :libvirt do |libvirt|
      libvirt.memory = 1024
      libvirt.cpus = 1
    end
    
    db.vm.provision "shell", path: "provision_db.sh"
  end

  # Web Server VM
  config.vm.define "web" do |web|
    web.vm.box = "debian/bookworm64"
    web.vm.hostname = "web-server"
    web.vm.network "private_network", ip: "192.168.56.10"
    web.vm.network "forwarded_port", guest: 80, host: 8080
    
    # Shared folder
    web.vm.synced_folder "./shared", "/var/www/html",
      owner: "www-data",
      group: "www-data",
      mount_options: ["dmode=755,fmode=644"]
    
    web.vm.provider :libvirt do |libvirt|
      libvirt.memory = 1024
      libvirt.cpus = 1
    end
    
    web.vm.provision "shell", path: "provision_web.sh"
  end
end
