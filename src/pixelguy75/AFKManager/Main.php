<?php
namespace pixelguy75\AFKManager;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getLogger()->info(TextFormat::GREEN."[AFKManager] loaded!");
    }
   
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."[AFKManager] unloaded!");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		switch($command->getName()){
			case "afk":
                $player = $this->getServer()->getPlayer($sender->getName());
                if ($player->hasPermission("afkplugin.afk")){
					$this->getServer()->broadcastMessage(TextFormat::GRAY . $sender->getPlayer()->getDisplayName() . " is now AFK");
				return true;
                }else{
                    $sender->sendMessage("You don't have permission");
                }
                break;
                            
            case "afkoff":
                $player = $this->getServer()->getPlayer($sender->getName());
                if ($player->hasPermission("afkplugin.afkoff")){
					$this->getServer()->broadcastMessage(TextFormat::GRAY . $sender->getPlayer()->getDisplayName() . " is no longer AFK");
				return true;
                }else{
                    $sender->sendMessage("You don't have permision!");                              
                }
                break;
                }    
		}
}
