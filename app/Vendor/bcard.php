<?php
//fpdf provides the pdf creation capability
require('fpdf17/fpdf.php');


class Bcards {
    
    private $outfile = "bcard.pdf";
    private $invites = array();
    private $text_color = 192;
    

    
    public function Bcards($invites){
        $this->invites = $invites;
        
    }
    
    public function addinvite($invite){
        $this->invites[] = $invite;
    }
    
    private function _printinvite($pdf, $invite, $i){        
        //x and y are the offset for the start of the card        
        $x=($i % 2)*85 + 20;
        $y=($i % 5)*54 + 15;
        //draw a crop mark (there will be one 
        //on top of the other for each column 
        //but it doesn't make much difference)
        $pdf->Line(10,$y,200,$y);

        //add a logo
        $pdf->Image(
           'http://chart.apis.google.com/chart?chf=a,s,000000|bg,lg,90,EFEFEF,0,BBABCF,1&chs=300x300&cht=qr&chld=|1&chl='.$invite['qrcode'],
            $x+48,
            $y+17,
            35,
            35,
            'PNG'
        );
        //set font to arial 10pt and colour to black
        
        $pdf->SetTextColor(0);
        

        //draw text
        if(empty($invite['name'])){
            $pdf->SetFont('Helvetica','',15);
            $pdf->Text(3+$x,6+$y, 'Please RSVP at:');
            $pdf->SetFont('Helvetica','B',18);
            $pdf->Text(3+$x,13+$y,'http://scottandjavaneh.us');
        }else{
            $pdf->SetFont('Helvetica','',12);
            $pdf->Text(3+$x,5+$y, $invite['name'].',');
            $pdf->SetFont('Helvetica','',8);
            $pdf->Text(3+$x,8.5+$y, 'please RSVP at:');
            $pdf->SetFont('Helvetica','B',18);
            $pdf->Text(3+$x,15+$y,'http://scottandjavaneh.us');
        }
        $pdf->SetFont('Helvetica','',10);
        $pdf->Text(3+$x,22+$y,'Your RSVP code:');
        $pdf->SetFont('Helvetica','B',35);
        $pdf->Text(10+$x,35+$y,$invite['code']);
        $pdf->SetFont('Helvetica','',9);
        $pdf->Text(3+$x,46+$y,'or scan the QR code on the');
        $pdf->Text(3+$x,50+$y,'right to RSVP using your phone');        
    }
    
    private function addpage($pdf, $page){        
        $pdf->AddPage();

        //set colour to grey
        //$pdf->SetDrawColor($this->text_color,192,192);
        $pdf->SetDrawColor($this->text_color);

        //vertical crop marks
        $pdf->Line(105,10,105,290);
        $pdf->Line(20,10,20,290);
        $pdf->Line(190,10,190,290);

        //top crop mark (others done with each card)
        $pdf->Line(10,285,290,285);      
        
        $i = 0;
        foreach($page as $invite){
            $this->_printinvite($pdf, $invite,$i);
            $i++;
        }        
    }
        
    
    private function chunkarray($arr){
        $all = array();
        $n  = array();
        $count = 0;
        foreach($arr as $a){            
            if(count($n)==10){                
                $all[] = $n;
                $n = array();
            }
            $n[] = $a;            
        }        
        if(!empty($n)){
            $all[] = $n;
        }        
        return $all;
        
    }
    
    public function printcards($output='file'){
        
        $pdf=new FPDF('P','mm','Letter');        
        $pdf->AliasNbPages();        
        $pages = $this->chunkarray($this->invites);
        
        
        foreach($pages as $page){            
            $this->addpage($pdf, $page);
        }           

        //add some meta data to the page.
        $pdf->SetFont('Arial','',5);
        $pdf->Text(10,293,'Card Size : 85mmx54mm  A4 Margins L:20mm T:15mm R:20mm B:12mm  Fonts: Arial');
        $pdf->Text(10,295.5,'Version 1.0 - 17/11/2008');
        $pdf->Text(150,293,'PDF created by Technomonk Industries - www.technomonk.com');
        
        if($output == "file"){
            $pdf->Output($this->outfile, 'F');
        }else{
            $pdf->Output($this->outfile, 'I');
        }
    }
}
?>