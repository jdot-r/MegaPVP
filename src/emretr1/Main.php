<?php

namespace MegaPVP;

use pocketmine\plugin\PluginBase;

use pocketmine\level\sound\BatSound;

use pocketmine\event\Listener;

use pocketmine\command\Command;

use pocketmine\command\CommandSender;

use pocketmine\nbt\tag\NameTag;

use pocketmine\scheduler\PluginTask;

use pocketmine\scheduler\Task;

use pocketmine\utils\TextFormat;

use pocketmine\level\Level;

use pocketmine\level\Position;

use pocketmine\level\particle\FlameParticle;

use pocketmine\utils\Config;

class Main extends PluginBase implements Listener
{
  
  public function OnEnable()
  {
    $this->getLogger()->info("MegaPVP has been Enabled!");
  }
  
  public function OnDisable()
  {
    $this->getLogger()->info("MegaPVP has been Disabled!");
  }
}
