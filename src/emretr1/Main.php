<?php

namespace MegaPVP;

use pocketmine\plugin\PluginBase;

use pocketmine\level\sound\BatSound;

use pocketmine\level\sound\ClickSound;

use pocketmine\level\sound\FizzSound;

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
    $this->config=new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
		if(!$this->config->exists("lobby"))
		{
			$this->config->set("lobby",lobbymap);
		}
		if(!$this->config->exists("arena"))
		{
			$this->config->set("arena",arenamap);
		}
		if(!$this->config->exists("WaitTime"))
		{
			$this->config->set("WaitTime",120);
		}
		if(!$this->config->exists("FinishTime"))
		{
			$this->config->set("FinishTime",120);
		}
		$this->config->set("FinishTime",120);
		$this->config->set("FinishTime",120);
		
  }
  
  public function OnDisable()
  {
    $this->getLogger()->info("MegaPVP has been Disabled!");
  }
  
  public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
    if(strtolower($cmd->getName()) === "megajoin") {
          if(isset($args[0])) {
              if($sender instanceof Player){
                $status = $args[0];
                  $sender->setNameTag(implode("<-*->"));
                  $sender->sendMessage("You Joined the match!");
                  $sender->OnStart();
              }
          }
    }
  }
  
  public function OnStart()
  {
    $player = $this->getPlayer();
    $this->setLevel(world);
    $player->teleport($this->lobby);
    $player->sendPopUp("Joining...");
    if(count($this->players)>=2)
    {
      switch($this->WaitTime)
      {
        case 1:
          $player->sendTip("§aGame Starting in 1 second");
          $player->getLevel()->addSound(new ClickSound($player));
        case 2:
          $player->sendTip("§aGame Starting in 2 second");
          $player->getLevel()->addSound(new ClickSound($player));
        case 3:
          $player->sendTip("§aGame Starting in 3 second");
          $player->getLevel()->addSound(new ClickSound($player));
        case 4:
          $player->sendTip("§aGame Starting in 4 second");
          $player->getLevel()->addSound(new ClickSound($player));
        case 5:
          $player->sendTip("§aGame Starting in 5 second");
          $player->getLevel()->addSound(new ClickSound($player));
        case 6:
          $player->sendTip("§aGame Starting in 6 second");
          $player->getLevel()->addSound(new ClickSound($player));
        case 7:
          $player->sendTip("§aGame Starting in 7 second");
          $player->getLevel()->addSound(new ClickSound($player));
        case 8:
          $player->sendTip("§aGame Starting in 8 second");
          $player->getLevel()->addSound(new ClickSound($player));
        case 9:
          $player->sendTip("§aGame Starting in 9 second");
          $player->getLevel()->addSound(new ClickSound($player));
        case 10:
          $player->sendTip("§aGame Starting in 10 second");
          $player->getLevel()->addSound(new ClickSound($player));
        case 60:
          $player->sendTip("§bGame Starting in 60 second");
          $player->getLevel()->addSound(new ClickSound($player));
        case 120:
          $player->sendTip("§dGame Starting in 120 second");
          $player->getLevel()->addSound(new ClickSound($player));
        case 0:
          $this->OnFinish;
          $player->teleport($this->arena);
          $player->setNameTag(implode("KILLER"));
          $player->getLevel()->addSound(new BatSound($player));
          $player->sendMessage("Game has been Started!");
          $player->sendPopUp("Go go go! Kill the Enemies!");
      }
    }
  }
  
  public function OnFinish()
  {
      switch($this->FinishTime)
      {
        case 1:
          $player->sendTip("§6Finishing in 0:01");
        case 2:
          $player->sendTip("§6Finishing in 0:02");
        case 3:
          $player->sendTip("§6Finishing in 0:03");
        case 4:
          $player->sendTip("§6Finishing in 0:04");
        case 5:
          $player->sendTip("§6Finishing in 0:05");
        case 6:
          $player->sendTip("§6Finishing in 0:06");
        case 7:
          $player->sendTip("§6Finishing in 0:07");
        case 8:
          $player->sendTip("§6Finishing in 0:08");
        case 9:
          $player->sendTip("§6Finishing in 0:09");
        case 10:
          $player->sendTip("§6Finishing in 0:10");
        case 60:
          $player->sendTip("§6Finishing in 1:00");
        case 120:
          $player->sendTip("§6Finishing in 2:00");
        case 0:
          $player->sendMessage("§cGame Finished!");
          $player->getLevel()->addSound(new FizzSound($player));
          $player->getInventory()->clearAll();
          $player->setLevel(world);
      }
  }
}
//to be countined... IN DEVELOPMENT
