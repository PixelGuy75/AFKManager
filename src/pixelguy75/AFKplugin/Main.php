<?php

namespace pixelguy75\AFKplugin;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\permission\Permissible;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getLogger()->info(TextFormat::GREEN."[AFKplugin] loaded!");
    }
   
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."[AFKplugin] unloaded!");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		switch($command->getName()){
			case "afk":
                            $player = $this->getServer()->getPlayer($sender->getName());
                            if ($player->hasPermission("afkplugin.afk")){
				$this->getServer()->broadcastMessage($sender->getPlayer()->getDisplayName() . " is now AFK");
				return true;
                            }
                            break;
                            
                        case "afkoff":
                            $player = $this->getServer()->getPlayer($sender->getName());
                            if ($player->hasPermission("afkplugin.afkoff")){
				$this->getServer()->broadcastMessage($sender->getPlayer()->getDisplayName() . " is no longer AFK");
				return true;
                            }
                            break;
		}
    }
?>
