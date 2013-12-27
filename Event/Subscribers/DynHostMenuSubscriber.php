<?php
namespace ACS\ACSPanelDynHostBundle\Event\Subscribers;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use ACS\ACSPanelBundle\Event\FilterMenuEvent;

class DynHostMenuSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            'menu.admin.after.items'     => array(
                array('dynhostItems', 10),
            ),
            'menu.reseller.after.items'     => array(
                array('dynhostItems', 10),
            ),
            'menu.user.after.items'     => array(
                array('dynhostItems', 10),
            )

        );
    }

    public function dynhostItems(FilterMenuEvent $menu_filter)
    {
        $menu = $menu_filter->getMenu();
        // TODO: Change the name of settings action
        $menu->addChild('menu.dynhost.main', array( 'route' => 'acsacs_dynhost_list'));
    }
}
