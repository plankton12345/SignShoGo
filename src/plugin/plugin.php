<?php

namespace plugin;


use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginLoader;
use pocketmine\plugin\PluginManager;
use pocketmine\event\player\PlayerJoinEvent;
 class plugin extends PluginBase implements Listener {

public function onEnable(){
    if($this->getServer()->getPluginManager()->getPlugin("PMMPKUNITORI") != null){
         $this->KUNITORIAPI = $this->getServer()->getPluginManager()->getPlugin("PMMPKUNITORI");
         $this->getLogger()->info("KUNITORIAPIを検出しました。");
           }else{
             $this->getLogger()->warning("KUNITORIAPIが見つかりませんでした"); 
         $this->getServer()->getPluginManager()->disablePlugin($this);
                       }
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    if(!file_exists($this->getDataFolder())){
           mkdir($this->getDataFolder(),0774,true);
        }
	   $this->CONFIG = new Config($this->getDataFolder()."userdata.yml",Config::YAML);

$this->getLogger()->info("CommandRankを読み込みました、ライセンスは厳守です");
 


}
public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    if($command->getName() ==="RankBuy"){
        $player = $sender->getPlayer();
        $name = $player->getName();
        $player->setDisplayName("{$args[0]}.{$name}");
        $this->CONFIG->set("{$name}.{$args[0]}{$name}");
        $this->CONFIG->save();
        
        
        
    }
    
}
public function PlayerJoin(PlayerJoinEvent $event) {
    $player = $event->getPlayer();
    
    $player->setDisplayName("ここに入力"); 
}
}
