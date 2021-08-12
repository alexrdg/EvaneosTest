<?php

class TemplateManager
{
    /**
     * @param Template $tpl
     * @param array $data
     *
     * @return Template
     */
    public function getTemplateComputed(Template $tpl, array $data)
    {
        if (!$tpl) {
            throw new \RuntimeException('no tpl given');
        }

        $replaced = clone($tpl);
        $replaced->subject = $this->computeText($replaced->subject, $data);
        $replaced->content = $this->computeText($replaced->content, $data);

        return $replaced;
    }

    /**
     * @param mixed $text
     * @param array $data
     *
     * @return mixed
     */
    private function computeText($text, array $data)
    {
        $quote = (isset($data['quote']) and $data['quote'] instanceof Quote) ? $data['quote'] : null;

        if ($quote !== null) {
            $placeholders = PlaceholderRepository::getInstance()->getPlaceholdersFromText($text);
            foreach ($placeholders as $placeholder) {
                $text = str_replace(
                    Placeholder::render($placeholder),
                    QuoteRepository::getInstance()->getQuoteValueFromPlaceholder($placeholder, $quote),
                    $text
                );
            }
        }

        return $text;
    }
}

