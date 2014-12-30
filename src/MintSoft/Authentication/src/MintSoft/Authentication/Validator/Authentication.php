<?php
namespace MintSoft\Authentication\Validator;

use Zend\ServiceManager\ServiceLocatorAwareInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\Validator\AbstractValidator;

class Authentication extends AbstractValidator implements ServiceLocatorAwareInterface
{
    const FAILED = 'loginFailed';

    protected $messageTemplates = [
        self::FAILED => "Given username or password is incorrect",
    ];

    /**
     * @var \MintSoft\Authentication\Authentication
     */
    private $authService;
    private $sm;

    public function isValid($value, $context = null)
    {
        $adapter = $this
            ->authService
            ->getAdapter()
            ->setCredential($context['password'])
            ->setIdentity($context['username']);

        $result = $this->authService->authenticate($adapter);

        if (!$result->isValid()) {
            $this->error(self::FAILED);

            return false;
        }

        return true;
    }

    /**
     * Set service locator
     *
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->sm          = $serviceLocator;
        $this->authService = $serviceLocator->getServiceLocator()->get('MintSoft\Authentication');
    }

    /**
     * Get service locator
     *
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->sm;
    }
}