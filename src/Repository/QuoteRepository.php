<?php

class QuoteRepository implements Repository
{
    use SingletonTrait;

    /**
     * @param int $id
     *
     * @return Quote
     */
    public function getById($id)
    {
        $generator = Faker\Factory::create();
        $generator->seed($id);
        return new Quote(
            $id,
            $generator->numberBetween(1, 10),
            $generator->numberBetween(1, 200),
            $generator->dateTime()
        );
    }

    /**
     * @param Placeholder $placeholder
     * @param Quote $quote
     *
     * @return string
     */
    public function getQuoteValueFromPlaceholder(Placeholder $placeholder, Quote $quote) {
        $APPLICATION_CONTEXT = ApplicationContext::getInstance();
        $_quoteFromRepository = QuoteRepository::getInstance()->getById($quote->id);
        $usefulObject = SiteRepository::getInstance()->getById($quote->siteId);
        $destinationOfQuote = DestinationRepository::getInstance()->getById($quote->destinationId);
        $_user = (isset($data['user']) and ($data['user'] instanceof User)) ? $data['user'] : $APPLICATION_CONTEXT->getCurrentUser();

        switch ($placeholder->name) {
            case Placeholder::QUOTE_SUMMARY_HTML:
                return Quote::renderHtml($_quoteFromRepository);
            case Placeholder::QUOTE_SUMMARY:
                return Quote::renderText($_quoteFromRepository);
            case Placeholder::QUOTE_DESTINATION_NAME:
                return $destinationOfQuote->countryName;
            case Placeholder::QUOTE_DESTINATION_LINK:
                return sprintf("%s/%s/quote/%s", $usefulObject->url, $destinationOfQuote->countryName, $_quoteFromRepository->id);
            case Placeholder::USER_FIRSTNAME:
                return $_user->firstname;
        }
    }
}

