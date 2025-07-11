<?php

namespace App\Core;

class SchemaGenerator
{
    private $siteConfig;
    private $seoConfig;

    public function __construct()
    {
        $this->siteConfig = require __DIR__ . '/../config/site.php';
        $this->seoConfig = require __DIR__ . '/../config/seo.php';
    }

    public function generate(string $type, array $customData = []): array
    {
        $method = 'generate' . ucfirst($type) . 'Schema';
        
        if (!method_exists($this, $method)) {
            throw new \InvalidArgumentException("Schema type '{$type}' is not supported");
        }

        return $this->$method($customData);
    }

    public function generateJson(string $type, array $customData = []): string
    {
        $schema = $this->generate($type, $customData);
        return json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    private function generateLocalBusinessSchema(array $customData = []): array
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => $this->seoConfig['business']['type'] ?? 'LocalBusiness',
            'name' => $this->siteConfig['name'],
            'description' => $this->seoConfig['seo']['description'],
            'url' => $this->seoConfig['seo']['domain'],
            'logo' => $this->seoConfig['seo']['og_image'],
            'image' => $this->seoConfig['seo']['og_image'],
            'telephone' => $this->siteConfig['phone']['number'],
            'email' => $this->siteConfig['email']['primary'],
            'priceRange' => $this->seoConfig['business']['price_range'] ?? '$$',
            'currenciesAccepted' => $this->seoConfig['business']['currencies_accepted'] ?? 'BRL',
            'paymentAccepted' => $this->seoConfig['business']['payment_accepted'] ?? 'Cash, Credit Card',
            'foundingDate' => $this->seoConfig['business']['founded'] ?? date('Y'),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => $this->seoConfig['address']['street'],
                'addressLocality' => $this->seoConfig['address']['city'],
                'addressRegion' => $this->seoConfig['address']['state'],
                'postalCode' => $this->seoConfig['address']['zip'],
                'addressCountry' => $this->seoConfig['address']['country'] ?? 'BR',
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => $this->seoConfig['geo']['latitude'] ?? '',
                'longitude' => $this->seoConfig['geo']['longitude'] ?? '',
            ],
            'openingHoursSpecification' => [
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                    'opens' => $this->seoConfig['business_hours']['opens'] ?? '09:00',
                    'closes' => $this->seoConfig['business_hours']['closes'] ?? '18:00',
                ],
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => 'Saturday',
                    'opens' => $this->seoConfig['business_hours']['saturday_opens'] ?? '09:00',
                    'closes' => $this->seoConfig['business_hours']['saturday_closes'] ?? '12:00',
                ],
            ],
            'sameAs' => array_filter([
                $this->seoConfig['social']['facebook'] ?? '',
                $this->seoConfig['social']['instagram'] ?? '',
                $this->seoConfig['social']['linkedin'] ?? '',
                $this->seoConfig['social']['twitter'] ?? '',
                $this->seoConfig['social']['youtube'] ?? '',
            ]),
        ];

        if (!empty($this->seoConfig['reviews']['aggregate_rating'])) {
            $schema['aggregateRating'] = [
                '@type' => 'AggregateRating',
                'ratingValue' => $this->seoConfig['reviews']['aggregate_rating'],
                'reviewCount' => $this->seoConfig['reviews']['review_count'] ?? '0',
                'bestRating' => $this->seoConfig['reviews']['best_rating'] ?? '5',
                'worstRating' => $this->seoConfig['reviews']['worst_rating'] ?? '1',
            ];
        }

        return array_merge($schema, $customData);
    }

    private function generateOrganizationSchema(array $customData = []): array
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $this->siteConfig['name'],
            'description' => $this->seoConfig['seo']['description'],
            'url' => $this->seoConfig['seo']['domain'],
            'logo' => $this->seoConfig['seo']['og_image'],
            'image' => $this->seoConfig['seo']['og_image'],
            'telephone' => $this->siteConfig['phone']['number'],
            'email' => $this->siteConfig['email']['primary'],
            'foundingDate' => $this->seoConfig['business']['founded'] ?? date('Y'),
            'legalName' => $this->seoConfig['business']['legal_name'] ?? $this->siteConfig['name'],
            'taxID' => $this->seoConfig['business']['tax_id'] ?? '',
            'numberOfEmployees' => $this->seoConfig['business']['employees'] ?? '',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => $this->seoConfig['address']['street'],
                'addressLocality' => $this->seoConfig['address']['city'],
                'addressRegion' => $this->seoConfig['address']['state'],
                'postalCode' => $this->seoConfig['address']['zip'],
                'addressCountry' => $this->seoConfig['address']['country'] ?? 'BR',
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => $this->siteConfig['phone']['number'],
                'contactType' => $this->seoConfig['contact']['contact_type'] ?? 'customer service',
                'email' => $this->siteConfig['email']['primary'],
                'availableLanguage' => $this->seoConfig['contact']['available_language'] ?? ['Portuguese'],
                'areaServed' => $this->seoConfig['contact']['area_served'] ?? 'BR',
            ],
            'sameAs' => array_filter([
                $this->seoConfig['social']['facebook'] ?? '',
                $this->seoConfig['social']['instagram'] ?? '',
                $this->seoConfig['social']['linkedin'] ?? '',
                $this->seoConfig['social']['twitter'] ?? '',
                $this->seoConfig['social']['youtube'] ?? '',
            ]),
        ];

        return array_merge($schema, $customData);
    }

    private function generateWebsiteSchema(array $customData = []): array
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => $this->siteConfig['name'],
            'description' => $this->seoConfig['seo']['description'],
            'url' => $this->seoConfig['seo']['domain'],
            'inLanguage' => $this->seoConfig['seo']['language'] ?? 'pt-BR',
            'author' => [
                '@type' => 'Organization',
                'name' => $this->seoConfig['seo']['author'] ?? $this->siteConfig['name'],
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => $this->seoConfig['seo']['publisher'] ?? $this->siteConfig['name'],
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => $this->seoConfig['seo']['og_image'],
                ],
            ],
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => [
                    '@type' => 'EntryPoint',
                    'urlTemplate' => $this->seoConfig['seo']['domain'] . '/search?q={search_term_string}',
                ],
                'query-input' => 'required name=search_term_string',
            ],
        ];

        return array_merge($schema, $customData);
    }

    private function generateArticleSchema(array $customData = []): array
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $customData['title'] ?? $this->seoConfig['seo']['title'],
            'description' => $customData['description'] ?? $this->seoConfig['seo']['description'],
            'image' => $customData['image'] ?? $this->seoConfig['seo']['og_image'],
            'author' => [
                '@type' => 'Person',
                'name' => $customData['author'] ?? $this->seoConfig['seo']['author'],
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => $this->seoConfig['seo']['publisher'] ?? $this->siteConfig['name'],
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => $this->seoConfig['seo']['og_image'],
                ],
            ],
            'datePublished' => $customData['datePublished'] ?? date('c'),
            'dateModified' => $customData['dateModified'] ?? date('c'),
            'inLanguage' => $this->seoConfig['seo']['language'] ?? 'pt-BR',
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => $customData['url'] ?? $this->seoConfig['seo']['domain'],
            ],
        ];

        return array_merge($schema, $customData);
    }

    private function generateBreadcrumbSchema(array $customData = []): array
    {
        $items = $customData['items'] ?? [];
        $listItems = [];

        foreach ($items as $index => $item) {
            $listItems[] = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $item['name'],
                'item' => $item['url'] ?? null,
            ];
        }

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $listItems,
        ];

        return $schema;
    }

    private function generateServiceSchema(array $customData = []): array
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => $customData['name'] ?? 'Serviços de SEO',
            'description' => $customData['description'] ?? $this->seoConfig['seo']['description'],
            'provider' => [
                '@type' => 'Organization',
                'name' => $this->siteConfig['name'],
                'url' => $this->seoConfig['seo']['domain'],
            ],
            'serviceType' => $customData['serviceType'] ?? 'SEO Services',
            'areaServed' => $this->seoConfig['contact']['service_area'] ?? ['BR'],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Catálogo de Serviços',
                'itemListElement' => array_map(function($service) {
                    return [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => $service,
                        ],
                    ];
                }, $this->seoConfig['products']['service_types'] ?? []),
            ],
        ];

        return array_merge($schema, $customData);
    }

    private function generateFaqSchema(array $customData = []): array
    {
        $questions = $customData['questions'] ?? [];
        $mainEntity = [];

        foreach ($questions as $qa) {
            $mainEntity[] = [
                '@type' => 'Question',
                'name' => $qa['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $qa['answer'],
                ],
            ];
        }

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $mainEntity,
        ];

        return $schema;
    }

    public function getSupportedTypes(): array
    {
        return [
            'localBusiness',
            'organization',
            'website',
            'article',
            'breadcrumb',
            'service',
            'faq',
        ];
    }
} 