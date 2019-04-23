<?php

declare(strict_types=1);

namespace Keepitfresh\SimpleUtils;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Utils\TextFormat as TF;
class Main extends PluginBase{
	public $label1 = TF::GRAY."SimpleUtils: ";
	public $lastpos = null;

	public function onEnable() : void{
		$this->getLogger()->info("Hello World!");
	}

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
		switch($command->getName()){
			case "fly":
			if(!$sender->hasPermission("utils.fly.use"))
			{
				$sender->sendMessage($this->label1.TF::RED."You do not have permission to use /fly");
			}else{
					if($sender->isFlying(true)){
						$sender->setAllowFlight(false);
						$sender->setFlying(false);
						$sender->sendMessage($this->label1.TF::RED."Fly Disabled!");
					}else{
						$sender->setAllowFlight(true);
						$sender->setFlying(true);
						$sender->sendMessage($this->label1.TF::GREEN."Fly Enabled!");
					}
			}
			return true;
			case "heal":
			if(!$sender->hasPermission("utils.heal.use"))
			{
				$sender->sendMessage($this->label1.TF::RED."You do not have permission to use /heal");
			}else{
				$sender->setHealth(20);
			}
			return true;
		}
	}

	public function onDisable() : void{
		$this->getLogger()->info("Bye");
	}

}
