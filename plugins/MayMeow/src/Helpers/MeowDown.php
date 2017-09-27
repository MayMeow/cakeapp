<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 6/20/2017
 * Time: 3:16 PM
 */

namespace MayMeow\Helpers;

class MeowDown extends Parsedown
{
    #
    # Fenced Code

    protected function blockFencedCode($Line)
    {
        if (preg_match('/^['.$Line['text'][0].']{3,}[ ]*([\w-]+)?[ ]*$/', $Line['text'], $matches))
        {
            $Element = array(
                'name' => 'code',
                'text' => '',
            );

            if (isset($matches[1]))
            {
                $class = 'language-'.$matches[1];

                $Element['attributes'] = array(
                    'class' => $class,
                );
            }

            $Block = array(
                'char' => $Line['text'][0],
                'element' => array(
                    'name' => 'pre',
                    'handler' => 'element',
                    'attributes' => ['class' => 'no-padding no-border'],
                    'text' => $Element,
                ),
            );

            return $Block;
        }
    }
}