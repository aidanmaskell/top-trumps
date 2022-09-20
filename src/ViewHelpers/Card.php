<?php

namespace Transformers\ViewHelpers;

class Card 
{
    public static function setContents(array $transformers) 
    {
        $contents = '';
        foreach($transformers as $transformer)
        {
            $contents.= (
                '<div class="card col-5 col-md-5 m-3 d-flex flex-direction-column align-items-center">
                    <div>
                        <img src="' . $transformer->getImg() . '" class="card-img-top " alt="Transformer">
                    </div>
                    <div class="row card-body text-center">
                        <h3 class="card-title">' . $transformer->getName() . '</h3>
                        <p class="card-text">Size: '. $transformer->getSize() . '</p>
                        <p class="card-text">Speed: '. $transformer->getSpeed() . '</p>
                        <p class="card-text">Power: '. $transformer->getPower() . '</p>
                        <p class="card-text">Disguise: '. $transformer->getDisguise() . '</p>
                        <p class="card-text">Rating: '. $transformer->getRating() . '</p>
                        <p class="card-text">Type: '. $transformer->getType() . '</p>
                        <p class="card-text">Won: '. $transformer->getWinner() . '</p>
                        <p class="card-text">Played: '. $transformer->getChosen() . '</p>
                        <form action="hidden.php" method="post" />
                            <input type="hidden" name="id" id="id" value="' . $transformer->getId() . '" />
                            <input class="btn btn-warning" type="submit" value="CHOOSE" />
                        </form>
                    </div>
                </div>' 
            );
        }
        return $contents;
    }
}