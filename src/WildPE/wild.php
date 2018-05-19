<?php
namespace WildPE;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\level\{Level,Position};
use pocketmine\math\Vector3;
use pocketmine\{Server,Player};
use pocketmine\utils\TextFormat;
use pocketmine\event\entity\EntityDamageEvent;

       class wild extends PluginBase implements  Listener {
          public function onEnable(){
              $this->getLogger()->info(C::AQUA . "Enabled Plugin WildPE by SinlesFlyer");
    }
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool {
		switch(strtolower($cmd->getName())){
			case "wild":
				if($sender->hasPermission("wild.command")) {
					if($sender instanceof Player) {
						$x = rand(1,350000);
            					$y = rand(1,256);
						$z = rand(1,350000);
						$sender->teleport($sender->getLevel()->getSafeSpawn(new Vector3($x, $y, $z)));
						$sender->addTitle(TF::AQUA . "§a§lTeleporting...");
						$sender->sendMessage(TF::AQUA . "§dYou have teleported to a random spot.");
					}
					else {
						$sender->sendMessage(TF::AQUA . "[Wild] &7Use this command in-game!");
					}
				}
				else {
					$sender->sendMessage(TF::AQUA . "§2You do not have permission to use this command!");
				}
				return true;
			break;
		}
	  }
	}
