<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        
        Partner::create([
            'name' => 'Elma',
            'url' => 'https://www.elma-ultrasonic.com/en/',
            'image' => 'Elmalogo.png',
            'smallimage' => 'Elmalogosmall.png',
            'description' => 'Especialistas em limpeza por ultrassons e vapor. Equipamentos de laboratório e industriais.'
        ]);
        
        Partner::create([
            'name' => 'PandoraAlloys',
            'url' => 'https://www.pandoralloys.com/en/',
            'image' => 'Pandoralogo.png',
            'smallimage' => 'Pandoralogosmall.png',
            'description' => 'Ligas especificas e inovadoras cumprindo com todas as normativas Europeias e internacionais.'
        ]);
        
        Partner::create([
            'name' => 'Mpf',
            'url' => 'https://www.mpfitalia.com/',
            'image' => 'Mpflogo.png',
            'smallimage' => 'Mpflogosmall.png',
            'description' => 'Bancadas de trabalho para joalheiros, cravadores e relojoeiros. Fabricados dos materiais mais nobres e com características particulares.'
        ]);
        
        Partner::create([
            'name' => 'SuperPike',
            'url' => 'https://www.hswalsh.com/manufacturers/super-pike',
            'image' => 'Superpikelogo.png',
            'smallimage' => 'Superpikelogosmall.png',
            'description' => 'Serras da mais alta qualidade para ourivesaria.'
        ]);
        
        Partner::create([
            'name' => 'RadWag',
            'url' => 'https://radwag.com/en/',
            'image' => 'Radwaglogo.png',
            'smallimage' => 'Radwaglogosmall.png',
            'description' => 'No topo da inovação em soluções de pesagem, desde balança comercial à micro balança para laboratório, e equipamentos verificáveis e aprovados pela metrologia legal.'
        ]);
        
        Partner::create([
            'name' => 'Vallorbe',
            'url' => 'https://www.vallorbe.com/en-ch',
            'image' => 'Vallorbelogo.png',
            'smallimage' => 'Vallorbelogosmall.png',
            'description' => 'Limas e limatões suíços de qualidade inquestionável.'
        ]);
        
        Partner::create([
            'name' => 'Badeco',
            'url' => 'https://www.badeco.com/',
            'image' => 'Badecologo.png',
            'smallimage' => 'Badecologosmall.png',
            'description' => 'Alta tecnologia made in swisse! Expoente máximo em micromotores e peças de mao para joalheiros e cravadores.'
        ]);
        
        Partner::create([
            'name' => 'ElettroLaser',
            'url' => 'https://www.elettrolaser.com/en/',
            'image' => 'Elettrolaserlogo.png',
            'smallimage' => 'Elettrolaserlogosmall.png',
            'description' => 'O melhor laser de soldadura da atualidade na ourivesaria. Para pequenas, médias e grandes empresas com gama de potencias e características variadas.'
        ]);
        
        Partner::create([
            'name' => 'Hatho',
            'url' => 'https://www.hatho.de/en/',
            'image' => 'Hathologo.png',
            'smallimage' => 'Hathologosmall.png',
            'description' => 'Escovas e micro escovas de polimento especifico da mais alta qualidade no mercado mundial.'
        ]);
        
        Partner::create([
            'name' => 'Indutherm',
            'url' => 'https://indutherm.de/en/',
            'image' => 'Induthermlogo.png',
            'smallimage' => 'Induthermlogosmall.png',
            'description' => 'Tecnologia de ponta em fundição, micro-fusão, extrusão e pulverização de metais preciosos e não ferrosos como Au, Ag, Pt, Ligas de Latão, aço e alumínio.'
        ]);
        
        Partner::create([
            'name' => 'Menzerna',
            'url' => 'https://www.menzerna.com/',
            'image' => 'Menzernalogo.png',
            'smallimage' => 'Menzernalogosmall.png',
            'description' => 'Pastas de polir de alta gama. Qualidade, rentabilidade e performance no polimento de metais plásticos e outros materiais.'
        ]);
        
        Partner::create([
            'name' => 'Otec',
            'url' => 'https://www.otec.de/en/',
            'image' => 'Oteclogo.png',
            'smallimage' => 'Oteclogosmall.png',
            'description' => 'Máquinas de polimento e decapagem de alta qualidade para joalheiros, ourives e relojoeiros.'
        ]);
        
        Partner::create([
            'name' => 'Niqua',
            'url' => 'https://www.niqua.de/',
            'image' => 'Niqualogo.png',
            'smallimage' => 'Niqualogosmall.png',
            'description' => 'Ferramentas de precisão e lâminas de serra de alta qualidade para joalheiros e artesãos.'
        ]);
    }
}
